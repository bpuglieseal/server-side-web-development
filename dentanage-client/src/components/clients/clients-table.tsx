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
import {Trash, Pencil} from 'lucide-react'

// Interfaces
import type {Client} from '@/interfaces/client'

interface ClientsTableProps {
  clients: Array<Client>
}

export const ClientsTable: FC<ClientsTableProps> = ({clients}) => {
  return (
    <Table>
      <TableCaption>A list of valid clients in our system</TableCaption>
      <TableHeader>
        <TableRow>
          <TableHead>ID</TableHead>
          <TableHead>DNI</TableHead>
          <TableHead>Name</TableHead>
          <TableHead>Surname</TableHead>
          <TableHead>Birthdate</TableHead>
          <TableHead className="text-right font-bold">Actions</TableHead>
        </TableRow>
      </TableHeader>
      <TableBody>
        {clients.map((client) => (
          <TableRow>
            <TableCell>{client.id}</TableCell>
            <TableCell>{client.dni}</TableCell>
            <TableCell>{client.name}</TableCell>
            <TableCell>{client.surname}</TableCell>
            <TableCell className="font-bold">{client.birhtdate}</TableCell>
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
