import type {FC} from 'react'
import {NavLink} from 'react-router'
import {Button} from '../ui/button'

export const Header: FC<object> = () => {
  return (
    <header>
      <div>
        <Button variant="link">
          <NavLink to="/clients">Clients</NavLink>
        </Button>
        <Button variant="link">
          <NavLink to="/dentists">Dentists</NavLink>
        </Button>
      </div>
    </header>
  )
}
