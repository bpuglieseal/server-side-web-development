export const getClients = async () => {
  const uri = '/clients'
  const response = await fetch(import.meta.env.VITE_API_URL + uri)
  return await response.json()
}
