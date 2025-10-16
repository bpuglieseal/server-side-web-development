// Hooks
import {useClients} from '@/hooks/useClients'

// Components
import {ClientsTable} from '../components/clients/clients-table'
import {Spinner} from '../components/ui/spinner'
import {Item, ItemMedia, ItemContent, ItemTitle} from '../components/ui/item'

function Clients() {
  const {data, loading} = useClients()

  return (
    <>
      {loading && (
        <div className="flex w-full max-w-xs flex-col gap-4 [--radius:1rem] mx-auto mt-10">
          <Item variant="outline">
            <ItemMedia>
              <Spinner className="size-6" />
            </ItemMedia>
            <ItemContent>
              <ItemTitle className="line-clamp-1">
                Loading Avalaible Clients...
              </ItemTitle>
            </ItemContent>
          </Item>
        </div>
      )}
      {!loading && data.length && (
        <div className="w-2/4 mx-auto mt-10">
          <ClientsTable clients={data} />
        </div>
      )}
    </>
  )
}

export default Clients
