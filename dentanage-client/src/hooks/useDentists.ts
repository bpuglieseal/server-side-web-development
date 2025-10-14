import {useEffect, useState} from 'react'
import {getDentists} from '../services/getDentists'

export const useDentist = () => {
  const [values, setValues] = useState({
    loading: false,
    data: []
  })

  useEffect(() => {
    const getData = async () => {
      const data = await getDentists()
      setValues({loading: false, data})
    }

    setValues((values) => ({...values, loading: true}))
    getData()
  }, [])

  return values
}
