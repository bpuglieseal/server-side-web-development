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
import {useDentistStore} from '@/store/dentists.store'
import {DentistForm} from './dentist-form'
import type {CreateDentistBody} from '@/services/createDentist'

export const DentistCreateDialog: FC<PropsWithChildren<object>> = ({
  children
}) => {
  const {create, get} = useDentistStore()
  const [open, setOpen] = useState<boolean>(false)

  return (
    <Dialog
      open={open}
      onOpenChange={setOpen}
    >
      <DialogTrigger asChild>{children}</DialogTrigger>
      <DialogContent className="sm:max-w-[425px] lg:min-w-3/12">
        <DialogHeader>
          <DialogTitle>Create Dentist</DialogTitle>
          <DialogDescription>
            <DentistForm
              createMode
              onClose={() => setOpen(false)}
              onSubmit={async (_data) => {
                const body: CreateDentistBody = {
                  dni: _data.dni,
                  name: _data.name,
                  surname: _data.surname,
                  onVacation: _data.onVacations ? 0 : 1,
                  birthdate: _data.birthDate
                }
                await create(body)
                await get()

                setOpen(false)
              }}
            />
          </DialogDescription>
        </DialogHeader>
      </DialogContent>
    </Dialog>
  )
}
