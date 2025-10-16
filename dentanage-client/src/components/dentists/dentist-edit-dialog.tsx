import {type FC, type PropsWithChildren} from 'react'
import {useForm} from 'react-hook-form'
import {yupResolver} from '@hookform/resolvers/yup'
import * as yup from 'yup'

// Components
import {
  Dialog,
  DialogClose,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger
} from '@/components/ui/dialog'
import {Button} from '../ui/button'
import type {Dentist} from '@/interfaces/dentists'

interface DentistEditDialogProps {
  dentist: Dentist
}

const editDentistFormSchema = yup.object({
  dni: yup.string().required(),
  name: yup.string().required(),
  surname: yup.string().required(),
  avalaible: yup.boolean().required(),
  birthdate: yup.string().required()
})

export type EditDentistFormDate = yup.InferType<typeof editDentistFormSchema>

export const DentistEditDialog: FC<
  PropsWithChildren<DentistEditDialogProps>
> = ({children, dentist}) => {
  const {
    register,
    handleSubmit,
    formState: {errors}
  } = useForm({
    resolver: yupResolver(editDentistFormSchema)
  })

  return (
    <Dialog>
      <DialogTrigger asChild>{children}</DialogTrigger>
      <DialogContent className="sm:max-w-[425px]">
        <DialogHeader>
          <DialogTitle>Delete Dentist</DialogTitle>
          <DialogDescription>
            Are you sure you want to delete the dentist "{dentist.name}{' '}
            {dentist.surname}"?
          </DialogDescription>
        </DialogHeader>
        <DialogFooter>
          <DialogClose asChild>
            <Button variant="outline">Cancel</Button>
          </DialogClose>
          <Button
            type="submit"
            className="bg-red-600 hover:bg-red-800 cursor-pointer"
          >
            Delete
          </Button>
        </DialogFooter>
      </DialogContent>
    </Dialog>
  )
}
