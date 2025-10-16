import type {FC} from 'react'

// Components
import {
  Table,
  TableBody,
  TableHead,
  TableHeader,
  TableRow,
  TableCaption
} from '@/components/ui/table'

// Interfaces
import type {Dentist} from '@/interfaces/dentists'
import {DentistRecord} from './dentist-record'

interface DentistsTableProps {
  dentists: Array<Dentist>
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
          <DentistRecord
            dentist={dentist}
            key={dentist.id}
          />
        ))}
      </TableBody>
    </Table>
  )
}
