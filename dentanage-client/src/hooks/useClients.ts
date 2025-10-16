import {useEffect, useState} from 'react'
import {getClients} from '../services/getClients'

export const useClients = () => {
  const [values, setValues] = useState({
    loading: false,
    data: []
  })

  useEffect(() => {
    const getData = async () => {
      const data = await getClients()
      setValues({loading: false, data})
    }

    setValues((values) => ({...values, loading: true}))
    getData()
  }, [])

  return values
}
