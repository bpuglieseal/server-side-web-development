// Hooks
import {useEffect} from 'react'
import {useDentistStore} from '@/store/dentists.store'

// Components
import {DentistsTable} from '../components/dentists/dentists-table'
import {Spinner} from '../components/ui/spinner'
import {Item, ItemMedia, ItemContent, ItemTitle} from '../components/ui/item'

function Dentists() {
  const {get, dentists, loading} = useDentistStore()

  useEffect(() => {
    get()
  }, [get])

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
      {!loading && dentists.length && (
        <div className="w-2/4 mx-auto mt-10 pb-6">
          <DentistsTable dentists={dentists} />
        </div>
      )}
    </>
  )
}

export default Dentists
