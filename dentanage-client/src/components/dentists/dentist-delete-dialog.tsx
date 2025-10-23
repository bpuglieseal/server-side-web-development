import {useState, type FC, type PropsWithChildren} from 'react'

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
import {useDentistStore} from '@/store/dentists.store'

interface DentistDeleteDialogProps {
  dentist: Dentist
}

export const DentistDeleteDialog: FC<
  PropsWithChildren<DentistDeleteDialogProps>
> = ({children, dentist}) => {
  const [open, setOpen] = useState<boolean>(false)
  const {delete: remove, get} = useDentistStore()

  async function handleDelete(id: string) {
    try {
      await remove(id)
      await get()
      setOpen(false)
    } catch (error) {
      console.log(error)
    }
  }

  return (
    <Dialog
      open={open}
      onOpenChange={setOpen}
    >
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
            onClick={() => handleDelete(dentist.id)}
          >
            Delete
          </Button>
        </DialogFooter>
      </DialogContent>
    </Dialog>
  )
}
