import type {Dentist} from '@/interfaces/dentists'

interface UpdateDentistBody {
  [key: string]: string
}

function parse(data: Partial<Dentist>): UpdateDentistBody {
  const body: UpdateDentistBody = {}

  if (data.birthDate) body.dentist_date_of_birth = data.birthDate
  if (data.name) body.dentist_name = data.name
  if (data.surname) body.dentist_surname = data.surname
  if (data.onVacations) body.dentist_on_vacation = data.onVacations

  return body
}

export const updateDentist = async (
  id: string | number,
  data: Partial<Dentist>
) => {
  const uri = `/dentists/${id}`
  const response = await fetch(import.meta.env.VITE_API_URL + uri, {
    body: JSON.stringify(parse(data)),
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json'
    }
  })
  return await response.text()
}
