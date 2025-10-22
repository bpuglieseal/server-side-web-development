import {type FC, type PropsWithChildren} from 'react'
import {useForm, Controller} from 'react-hook-form'
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
import {Checkbox} from '../ui/checkbox'
import type {Dentist} from '@/interfaces/dentists'

const dentistFormSchema = yup.object({
  dni: yup.string().required(''),
  name: yup.string().required('The name is required'),
  surname: yup.string().required('The name is required'),
  onVacations: yup.boolean(),
  birthDate: yup.string().required('The birt hdate is required')
})

export type DentistFormDataType = yup.InferType<typeof dentistFormSchema>

interface DentistEditFormProps {
  dentist?: Dentist
  onSubmit: (_data: DentistFormDataType) => void | Promise<void>
  onClose: () => void
  createMode?: boolean
}

export const DentistForm: FC<PropsWithChildren<DentistEditFormProps>> = ({
  dentist,
  onSubmit,
  onClose,
  createMode = false
}) => {
  const {
    register,
    handleSubmit,
    formState: {errors},
    control
  } = useForm({
    resolver: yupResolver(dentistFormSchema),
    defaultValues: {
      name: dentist?.name,
      surname: dentist?.surname,
      dni: dentist?.dni,
      birthDate: dentist?.birthDate,
      onVacations: dentist?.onVacations
        ? parseInt(dentist.onVacations) === 0
        : false
    }
  })

  return (
    <div className="w-full">
      <form
        onSubmit={handleSubmit((data) => onSubmit(data))}
        className="mt-3"
      >
        <FieldGroup>
          <FieldSet>
            <FieldGroup className="[&>*]:gap-2 gap-4">
              <Field>
                <FieldLabel htmlFor="name">DNI</FieldLabel>
                <Input
                  id="name"
                  placeholder="12345678A"
                  disabled={!createMode}
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
                  aria-invalid={!!errors?.birthDate?.message}
                  type="date"
                  placeholder="Rabbit"
                  {...register('birthDate')}
                />
                {!!errors?.birthDate?.message && (
                  <FieldError>{errors.birthDate.message}</FieldError>
                )}
              </Field>
              <Field className="mt-2">
                <Controller
                  control={control}
                  name="onVacations"
                  render={({field}) => (
                    <FieldLabel className="hover:bg-accent/50 flex items-start gap-3 rounded-lg border p-3 has-[[aria-checked=false]]:text-yellow-800 has-[[aria-checked=true]]:border-green-600 has-[[aria-checked=true]]:bg-green-50 dark:has-[[aria-checked=true]]:border-green-900 dark:has-[[aria-checked=true]]:bg-green-950 has-[[aria-checked=false]]:border-yellow-600 has-[[aria-checked=false]]:bg-yellow-50 dark:has-[[aria-checked=false]]:border-yellow-900 dark:has-[[aria-checked=false]]:bg-yellow-950">
                      <Checkbox
                        className="data-[state=checked]:border-green-600 data-[state=checked]:bg-green-600 data-[state=checked]:text-white dark:data-[state=checked]:border-green-700 dark:data-[state=checked]:bg-green-700"
                        checked={field.value}
                        onCheckedChange={field.onChange}
                      />
                      <div className="grid gap-1.5 font-normal">
                        <p className="text-sm leading-none font-medium">
                          Avalaible
                        </p>
                        <p className="text-muted-foreground text-sm">
                          Check if the dentist is available (leave unchecked if
                          on vacation)
                        </p>
                      </div>
                    </FieldLabel>
                  )}
                />
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
              onClick={() => onClose()}
            >
              Cancel
            </Button>
          </Field>
        </FieldGroup>
      </form>
    </div>
  )
}
