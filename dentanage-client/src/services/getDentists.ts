export const getDentists = async () => {
  const uri = '/dentists'
  const response = await fetch(import.meta.env.VITE_API_URL + uri)
  return await response.json()
}
