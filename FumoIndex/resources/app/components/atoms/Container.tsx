import React from 'react'

interface ContainerProps {
    children?: React.ReactNode,
    className?: string,
    margin?: boolean,
}

function Container(
    {
        children = null,
        className = '',
        margin = false,
    }: ContainerProps
) {
    return <div className={`bg-white overflow-hidden ${margin ? 'mt-4' : ''}`}>
        <div className={`container mx-auto ${className}`}>
            {children}
        </div>
    </div>
}

export default Container
