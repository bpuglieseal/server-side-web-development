// Hooks
import {useDentist} from '../hooks/useDentists'

// Components
import {DentistsTable} from '../components/dentists/dentists-table'
import {Spinner} from '../components/ui/spinner'
import {Item, ItemMedia, ItemContent, ItemTitle} from '../components/ui/item'

function Dentists() {
  const {data, loading} = useDentist()

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
                Loading Avalaible Dentists...
              </ItemTitle>
            </ItemContent>
          </Item>
        </div>
      )}
      {!loading && data.length && (
        <div className="w-2/4 mx-auto mt-10">
          <DentistsTable dentists={data} />
        </div>
      )}
    </>
  )
}

export default Dentists
