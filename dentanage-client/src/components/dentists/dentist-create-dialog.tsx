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

export const DentistCreateDialog: FC<PropsWithChildren<object>> = ({
  children
}) => {
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
          <DialogTitle>Create Dentist</DialogTitle>
          <DialogDescription>
            <DentistForm
              onClose={() => setOpen(false)}
              onSubmit={async (_data) => {
                const data = {
                  ..._data,
                  onVacations: _data.onVacations ? '0' : '1'
                }
                console.log(data)
                setOpen(false)
              }}
            />
          </DialogDescription>
        </DialogHeader>
      </DialogContent>
    </Dialog>
  )
}
