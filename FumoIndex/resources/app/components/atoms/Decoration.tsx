import { motion, Transition } from 'framer-motion';

interface Props {
    duration?: number,
    className?: string
    transition?: Transition,
}

function Decoration(props: Props) {
    return <>
        <motion.div
            className='flex mx-4 transform-origin-top'
            transition={{ duration: 1, ease: "circInOut" }}
            initial={{ height: "50px" }}
            viewport={{once: true, amount: 0.9 }}
            whileInView={{ height: "100%" }}
        >
            <div className={`decoration-line ${props.className}`}>
                <div className='decoration-head'></div>
                <div className='decoration-head'></div>
            </div>
        </motion.div>
    </>
}

export default Decoration
