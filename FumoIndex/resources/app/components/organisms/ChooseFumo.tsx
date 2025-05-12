import { useState } from 'react'
import Container from '../atoms/Container'
import ImageViewer from '../molecules/ImageViewer'
import FumoMarisa from '../../../assets/png/fumo2.png'
import Button from '../atoms/Button'
import { motion } from 'framer-motion'

interface FumoData {
    name: string
    version: string
    image: string
}

function ChooseFumo() {
    const [showFumo, setShowFumo] = useState<boolean>(false)
    const [fumoData, setFumoData] = useState<FumoData>()
    const [loading, setLoading] = useState<boolean>(false)
    const endpoint = "INSERT ENDPOINT HERE :^)"

    const getRandomFumo = async () => {
        // TODO: get random fumo from api
        
        setLoading(true)
        await setTimeout(() => {
            setShowFumo(true)
            setLoading(false)
            setFumoData({
                name: "Reimu Hakurei",
                version: "1.0",
                image: FumoMarisa
            })
        }, 2000)
    }

    return (
        <Container margin className='flex duration-500 flex-col justify-between gap-10 items-center p-10'>
            <div className='flex flex-col gap-2 text-center'>
                <h1 className='text-primary'>Let destiny choose for you</h1>
                <p className='text-gray-500 text-xl'>Press the button and get surprised</p>
            </div>
            {
                showFumo && (
                    <motion.div initial={{ scale: 0 }} animate={{ scale: 1 }} transition={{ duration: 0.3, ease: "backInOut" }} className="w-150 flex flex-col gap-10">
                        <ImageViewer imageUrl={fumoData?.image} altText={fumoData?.name} />
                        <div className="flex flex-col items-center">
                            <h4 className="text-2xl font-bold text-gray-500">{fumoData?.name}</h4>
                            <span className="text-gray-500">{fumoData?.version}</span>
                        </div>
                    </motion.div>
                )
            }
            <Button label="Get a random fumo" variant="primary" disabled={loading} onClick={getRandomFumo} />
        </Container>
    )
}

export default ChooseFumo
