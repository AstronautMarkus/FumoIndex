import Link, { LinkProps } from '../atoms/Link'

interface FooterLinksProps {
    title?: string
    links: LinkProps[]
}

function FooterLinks(props: FooterLinksProps) {
    const {
        title,
        links = [{ label: "", to: "", target: "self", variant: "dark" }]
    } = props

    return (
        <div className='flex flex-col gap-1 items-start w-1/8 '>
            <h4 className='text-white'>{title}</h4>
            {
                links.map((link, index) => {
                    return <Link key={index} to={link.to} target={link.target} label={link.label} />
                })
            }
        </div>
    )
}

export default FooterLinks
