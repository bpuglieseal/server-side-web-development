import type {FC} from 'react'

// Components
import {TableCell, TableRow} from '@/components/ui/table'
import type {Dentist} from '@/interfaces/dentists'

import {DentistDeleteDialog} from './dentist-delete-dialog'
import {Button} from '../ui/button'
import {CircleX, CircleCheckBig, Trash, Pencil} from 'lucide-react'

interface DentistRecordProps {
  dentist: Dentist
}

export const DentistRecord: FC<DentistRecordProps> = ({dentist}) => {
  return (
    <TableRow>
      <TableCell>{dentist.id}</TableCell>
      <TableCell>{dentist.dni}</TableCell>
      <TableCell>{dentist.name}</TableCell>
      <TableCell>{dentist.surname}</TableCell>
      <TableCell className="font-bold">{dentist.birthDate}</TableCell>
      <TableCell className="font-bold text-center">
        <span className="flex justify-center">
          {!parseInt(dentist.onVacations) ? (
            <CircleCheckBig
              className="text-green-700"
              size={24}
            />
          ) : (
            <CircleX
              className="text-red-700"
              size={24}
            />
          )}
        </span>
      </TableCell>
      <TableCell>
        <span className="flex justify-end gap-2">
          <Button
            variant="outline"
            className="cursor-pointer"
            size="icon"
          >
            <Pencil size={24} />
          </Button>
          <DentistDeleteDialog dentist={dentist}>
            <Button
              variant="outline"
              className="cursor-pointer"
              size="icon"
            >
              <Trash size={24} />
            </Button>
          </DentistDeleteDialog>
        </span>
      </TableCell>
    </TableRow>
  )
}
