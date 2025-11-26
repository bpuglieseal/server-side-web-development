import {create} from 'zustand'
import {type Dentist} from '../interfaces/dentists'
import {getDentists} from '@/services/getDentists'
import {updateDentist} from '@/services/updateDentist'
import {createDentist, type CreateDentistBody} from '@/services/createDentist'
import {deleteDentist} from '@/services/deleteDentist'

type DentistsState = {
  // get state
  dentists: Array<Dentist>
  loading: boolean

  // update state
  updating: boolean

  // create state
  creating: boolean

  // delete state
  deleting: boolean
}

type DentistsActions = {
  get: () => Promise<void>
  update: (id: string, data: Partial<Dentist>) => Promise<void>
  create: (data: CreateDentistBody) => Promise<void>
  delete: (id: string | number) => Promise<void>
}

export const useDentistStore = create<DentistsState & DentistsActions>(
  (set) => ({
    dentists: [],
    loading: false,

    // updating state
    updating: false,
    // creating state
    creating: false,
    // deleting state
    deleting: false,

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
    },

    delete: async (id: string | number) => {
      set({deleting: true})
      try {
        await deleteDentist(id)
        set(({dentists}) => ({
          updating: false,
          dentists: dentists.filter((dentist) => dentist.id !== id)
        }))
      } catch (error) {
        console.log(error)
      }
    },

    create: async (data: CreateDentistBody) => {
      set({creating: true})
      try {
        await createDentist(data)
        set({creating: false})
      } catch (error) {
        console.log(error)
      }
    }
  })
)
