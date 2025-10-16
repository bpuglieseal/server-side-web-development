import type {FC} from 'react'
import {NavLink} from 'react-router'
import {Button} from '../ui/button'

export const Header: FC<object> = () => {
  return (
    <header>
      <nav>
        <ul className="flex flex-row justify-center pt-6 w-3/4 mx-auto gap-4">
          <li>
            <Button
              size="lg"
              variant="outline"
              asChild
            >
              <NavLink to="/clients">Clients</NavLink>
            </Button>
          </li>
          <li>
            <Button
              size="lg"
              variant="outline"
              asChild
            >
              <NavLink to="/dentists">Dentists</NavLink>
            </Button>
          </li>
        </ul>
      </nav>
    </header>
  )
}
