import {createRoot} from 'react-dom/client'
import './index.css'

// Providers
import {BrowserRouter, Routes, Route} from 'react-router'
import {Header} from './components/shared/header.tsx'

// Pages
import Dentists from './pages/dentists.tsx'
import Clients from './pages/clients.tsx'

createRoot(document.getElementById('root')!).render(
  <BrowserRouter>
    <Header />
    <Routes>
      <Route
        path="clients"
        element={<Clients />}
      />
      <Route
        path="dentists"
        element={<Dentists />}
      />
    </Routes>
  </BrowserRouter>
)
