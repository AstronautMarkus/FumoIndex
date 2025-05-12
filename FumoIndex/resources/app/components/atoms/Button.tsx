import { useEffect } from "react"

/**
 * Add stuff as u need
 * - Anzar
 */
interface ButtonProps {
    className?: string
    onClick?: () => void
    onMouseEnter?: () => void
    onMouseLeave?: () => void
    disabled?: boolean
    type?: 'button' | 'submit'
    variant?: 'primary' | 'outline'
    size?: 'xl' | 'base' | 'sm' | '2xl',
    icon?: React.ReactNode,
    gap?: number,
    label?: string,
    textAlign?: 'start' | 'center' | 'end',
    textWrap?: 'wrap' | 'nowrap' | 'pretty' | 'balance',
    padding?: number
}

function Button(props: ButtonProps) {
    let {
        className = '',
        onClick = () => { },
        onMouseEnter = () => { },
        onMouseLeave = () => { },
        disabled = false,
        type = 'button',
        variant = 'primary',
        size = 'xl',
        icon = null,
        gap = 2,
        label = '',
        textAlign = 'center',
        textWrap = 'wrap',
    } = props

    return <button onClick={disabled ? () => { } : onClick} onMouseEnter={onMouseEnter} onMouseLeave={onMouseLeave} type={type}
        className={`btn flex items-center justify-center text-${textWrap} ${disabled} btn-${variant} ${disabled && 'disabled'} text-${size} gap-${gap} p-3 ${className}`}>
        {icon}
        {label &&
            <div className={`flex w-full justify-${textAlign} text-center`}>
                {label}
            </div>
        }
    </button>
}

export default Button
