import {createRoot} from 'react-dom/client'
import './index.css'
import App from './App.tsx'

// Providers
import {BrowserRouter, Routes, Route} from 'react-router'
import {Header} from './components/shared/header.tsx'

createRoot(document.getElementById('root')!).render(
  <BrowserRouter>
    <Header />
    <Routes>
      <Route
        path="dentists"
        element={<App />}
      />
    </Routes>
  </BrowserRouter>
)
