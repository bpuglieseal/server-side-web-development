import {type FC, type PropsWithChildren} from 'react'
import {useForm} from 'react-hook-form'
import {yupResolver} from '@hookform/resolvers/yup'
import * as yup from 'yup'

// Components
import {
  Field,
  FieldGroup,
  FieldLabel,
  FieldSeparator,
  FieldSet,
  FieldError
} from '@/components/ui/field'
import {Button} from '@/components/ui/button'
import {Input} from '../ui/input'
import type {Dentist} from '@/interfaces/dentists'

const editDentistFormSchema = yup.object({
  dni: yup.string().required(''),
  name: yup.string().required('The name is required'),
  surname: yup.string().required('The name is required'),
  avalaible: yup.boolean().required(),
  birthdate: yup.string().required('The birt hdate is required')
})

export type EditDentistFormDataType = yup.InferType<
  typeof editDentistFormSchema
>

interface DentistEditFormProps {
  dentist: Dentist
}

export const DentistEditForm: FC<PropsWithChildren<DentistEditFormProps>> = ({
  dentist
}) => {
  const {
    register,
    handleSubmit,
    formState: {errors}
  } = useForm({
    resolver: yupResolver(editDentistFormSchema),
    defaultValues: {
      name: dentist.name,
      surname: dentist.surname,
      dni: dentist.dni,
      birthdate: dentist.birthDate,
      avalaible: true
    }
  })

  return (
    <div className="w-full">
      <form
        onSubmit={handleSubmit((data) => {
          console.log(data)
        })}
        className="mt-3"
      >
        <FieldGroup>
          <FieldSet>
            <FieldGroup className="[&>*]:gap-2 gap-4">
              <Field>
                <FieldLabel htmlFor="name">DNI</FieldLabel>
                <Input
                  id="name"
                  placeholder="Evil"
                  disabled
                  {...register('dni')}
                />
              </Field>
              <Field>
                <FieldLabel htmlFor="name">Name</FieldLabel>
                <Input
                  aria-invalid={!!errors?.name?.message}
                  id="name"
                  placeholder="Evil"
                  {...register('name')}
                />
                {!!errors?.name?.message && (
                  <FieldError>{errors.name.message}</FieldError>
                )}
              </Field>
              <Field>
                <FieldLabel>Surname</FieldLabel>
                <Input
                  aria-invalid={!!errors.surname?.message}
                  placeholder="Rabbit"
                  {...register('surname')}
                />
                {!!errors?.surname?.message && (
                  <FieldError>{errors.surname.message}</FieldError>
                )}
              </Field>
              <Field>
                <FieldLabel>Birthdate</FieldLabel>
                <Input
                  aria-invalid={!!errors?.birthdate?.message}
                  type="date"
                  placeholder="Rabbit"
                  {...register('birthdate')}
                />
                {!!errors?.birthdate?.message && (
                  <FieldError>{errors.birthdate.message}</FieldError>
                )}
              </Field>
            </FieldGroup>
          </FieldSet>
          <FieldSeparator />
          <Field
            orientation="horizontal"
            className="justify-end"
          >
            <Button type="submit">Submit</Button>
            <Button
              variant="outline"
              type="button"
            >
              Cancel
            </Button>
          </Field>
        </FieldGroup>
      </form>
    </div>
  )
}
