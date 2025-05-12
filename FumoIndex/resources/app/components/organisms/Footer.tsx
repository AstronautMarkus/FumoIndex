import fumoIndexLogo from '../../../assets/svg/FUMO_INDEX.svg';
import Button from '../atoms/Button';
import { FaGithub } from 'react-icons/fa';
import FooterLinks from '../molecules/FooterLinks';
import { LinkProps } from '../atoms/Link';

interface Props { }

function Footer(props: Props) {
    const { } = props

    const site: LinkProps[] = [
        { label: "Home", to: "/" },
        { label: "Fumo List", to: "/fumo-list" },
        { label: "Fumo Origins", to: "/fumo-origins" }
    ]

    const credits: LinkProps[] = [
        { label: "AstronautMarkus", to: "https://github.com/AstronautMarkus", target: "blank" },
        { label: "AnzarDev", to: "https://github.com/anzar2", target: "blank" }
    ]

    return (
        <footer className='mt-[15px] flex justify-between bg-primary p-20 '>
            <div className='text-white mx-auto container max-w-250'>
                <img src={fumoIndexLogo} alt="FumoIndexLogo"  {...{ width: 150, height: 150 }} />
                <p className='mt-5'> © FumoIndex Project. All rights reserved. </p>
                <p> This is a non-commercial archival project dedicated to cataloging all officially licensed "FumoFumo" plush merchandise. </p>
                <p className='my-5'> All characters, names, and designs are property of their respective owners. </p>
                <Button icon={<FaGithub />} variant="primary" />
            </div>
            <FooterLinks title="Site" links={site} />
            <FooterLinks title="Credits" links={credits} />
        </footer>
    )
}

export default Footer
