import {type FC, type PropsWithChildren} from 'react'
// Components
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogHeader,
  DialogTitle,
  DialogTrigger
} from '@/components/ui/dialog'
import type {Dentist} from '@/interfaces/dentists'
import {DentistEditForm} from './dentist-edit-form'

interface DentistEditDialogProps {
  dentist: Dentist
}

export const DentistEditDialog: FC<
  PropsWithChildren<DentistEditDialogProps>
> = ({children, dentist}) => {
  return (
    <Dialog>
      <DialogTrigger asChild>{children}</DialogTrigger>
      <DialogContent className="sm:max-w-[425px] lg:min-w-3/12">
        <DialogHeader>
          <DialogTitle>Edit Dentist</DialogTitle>
          <DialogDescription>
            <DentistEditForm dentist={dentist} />
          </DialogDescription>
        </DialogHeader>
      </DialogContent>
    </Dialog>
  )
}
