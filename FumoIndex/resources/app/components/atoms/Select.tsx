import React from 'react'

interface Props {
    options?: { label: string, value: string }[]
    defaultValue?: string,
}
/**
 * ```
 * options: { label: string, value: string }[]
 * defaultValue?: string
 * ```
 */
function Select(props: Props) {
    const { options, defaultValue } = props


    return <select className={`select`} defaultValue={defaultValue} onChange={(e) => { e.target.blur() }}>
        {
            options?.map((option, index) => {
                return <option key={index} value={option.value}>{option.label}</option>
            })
        }
    </select>
}

export default Select
