import {useState, type FC, type PropsWithChildren} from 'react'
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
import {
  DentistEditForm,
  type EditDentistFormDataType
} from './dentist-edit-form'
import {useDentistStore} from '@/store/dentists.store'

interface DentistEditDialogProps {
  dentist: Dentist
}

export const DentistEditDialog: FC<
  PropsWithChildren<DentistEditDialogProps>
> = ({children, dentist}) => {
  const {update} = useDentistStore()
  const [open, setOpen] = useState<boolean>(false)

  return (
    <Dialog
      open={open}
      onOpenChange={setOpen}
    >
      <DialogTrigger asChild>{children}</DialogTrigger>
      <DialogContent className="sm:max-w-[425px] lg:min-w-3/12">
        <DialogHeader>
          <DialogTitle>Edit Dentist</DialogTitle>
          <DialogDescription>
            <DentistEditForm
              dentist={dentist}
              onSubmit={async (_data: EditDentistFormDataType) => {
                const data: Partial<Dentist> = {
                  ..._data,
                  onVacations: _data.onVacations ? '0' : '1'
                }
                await update(dentist.id, data)
                setOpen(false)
              }}
            />
          </DialogDescription>
        </DialogHeader>
      </DialogContent>
    </Dialog>
  )
}
