import type {FC} from 'react'

// Components
import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
  TableCaption
} from '@/components/ui/table'
import {Button} from '../ui/button'
import {CircleX, CircleCheckBig, Trash, Pencil} from 'lucide-react'

// Interfaces
import type {Dentists} from '@/interfaces/dentists'

interface DentistsTableProps {
  dentists: Array<Dentists>
}

export const DentistsTable: FC<DentistsTableProps> = ({dentists}) => {
  return (
    <Table>
      <TableCaption>A list of valid dentists in our system</TableCaption>
      <TableHeader>
        <TableRow>
          <TableHead>ID</TableHead>
          <TableHead>DNI</TableHead>
          <TableHead>Name</TableHead>
          <TableHead>Surname</TableHead>
          <TableHead>Birthdate</TableHead>
          <TableHead className="text-center">Avalaible</TableHead>
          <TableHead className="text-right font-bold">Actions</TableHead>
        </TableRow>
      </TableHeader>
      <TableBody>
        {dentists.map((dentist) => (
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
                <Button
                  variant="outline"
                  className="cursor-pointer"
                  size="icon"
                >
                  <Trash size={24} />
                </Button>
              </span>
            </TableCell>
          </TableRow>
        ))}
      </TableBody>
    </Table>
  )
}
