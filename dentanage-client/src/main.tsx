import {createRoot} from 'react-dom/client'
import './index.css'
import App from './App.tsx'

// Providers
import {BrowserRouter, Routes, Route} from 'react-router'

createRoot(document.getElementById('root')!).render(
  <BrowserRouter>
    <Routes>
      <Route
        path="dentists"
        element={<App />}
      />
    </Routes>
  </BrowserRouter>
)
