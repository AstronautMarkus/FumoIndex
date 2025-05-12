/**
 * Add stuff as u need
 * - Anzar
 */
interface Props {
    className?: string
    value?: string
    placeholder?: string
    disabled?: boolean
    type?: 'text' | 'password' | 'email' | 'number'
    size?: 'xl' | 'base' | 'sm' | '2xl'
}

function Input(props: Props) {
    let {
        className = '',
        value = '',
        placeholder = '',
        disabled = false,
        type = 'text',
        size = 'xl',    
    } = props

    return <input
        disabled={props.disabled}
        value={props.value} 
        type={props.type} 
        placeholder={props.placeholder} 
        className={`input ${disabled} p-3 text-${size}`} />
}

export default Input
