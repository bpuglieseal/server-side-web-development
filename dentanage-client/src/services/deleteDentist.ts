export const deleteDentist = async (id: string | number) => {
  const uri = '/dentists' + '/' + id
  const response = await fetch(import.meta.env.VITE_API_URL + uri, {
    method: 'DELETE',
    headers: {
      'Content-Type': 'application/json'
    }
  })
  return await response.text()
}
