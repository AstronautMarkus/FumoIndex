import React from 'react'
import fumoIndexLogo from '../../../assets/svg/FUMO_INDEX.svg';
import Button from '../atoms/Button';
import { FaLanguage } from 'react-icons/fa';
import Select from '../atoms/Select';

interface Props { }

function Navbar(props: Props) {
    const { } = props
    
    return <header className='bg-primary py-2 flex justify-between items-center'>
        <nav className='container mx-auto px-20 flex justify-between items-center'>
            <img src={fumoIndexLogo} alt="FumoIndexLogo"  {...{ width: 100, height: 100 }} />
            
        </nav>
    </header>
}

export default Navbar
