export interface CreateDentistBody {
  dni: string
  name: string
  surname: string
  onVacation: number
  birthdate: string
}

export const createDentist = async (body: CreateDentistBody) => {
  const uri = '/dentists'
  const response = await fetch(import.meta.env.VITE_API_URL + uri, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(body)
  })
  return await response.text()
}
