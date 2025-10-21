import {create} from 'zustand'
import {type Dentist} from '../interfaces/dentists'
import {getDentists} from '@/services/getDentists'
import {updateDentist} from '@/services/updateDentist'

type DentistsState = {
  // get state
  dentists: Array<Dentist>
  loading: boolean

  // update state
  updating: boolean
}

type DentistsActions = {
  get: () => Promise<void>
  update: (id: string, data: Partial<Dentist>) => Promise<void>
}

export const useDentistStore = create<DentistsState & DentistsActions>(
  (set) => ({
    dentists: [],
    loading: false,

    // updating state
    updating: false,

    // Actions
    get: async () => {
      set({loading: true})
      try {
        const dentists = await getDentists()
        set({loading: false, dentists})
      } catch (error) {
        console.log(error)
      }
    },

    update: async (id: string | number, data: Partial<Dentist>) => {
      set({updating: true})
      try {
        await updateDentist(id, data)
        set(({dentists}) => ({
          updating: true,
          dentists: dentists.map((dentist) =>
            dentist.id === id ? {...dentist, ...data} : dentist
          )
        }))
      } catch (error) {
        console.log(error)
      }
    }
  })
)
