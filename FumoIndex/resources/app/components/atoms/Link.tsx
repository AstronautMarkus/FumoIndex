import { Link as RouterLink } from 'react-router-dom'
export interface LinkProps {
    to?: string,
    target?: "self" | "blank",
    variant?: "light" | "dark",
    label?: string
}

function Link(props: LinkProps) {
    const {
        to = "",
        target = "self",
        variant = "dark",
        label
    } = props

    return (
        <RouterLink
            to={to}
            target={`_${target}`}
            className={`duration-200 text-white link-${variant}`}>
            {label}
        </RouterLink>
    )
}

export default Link
