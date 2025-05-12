import { useState } from 'react'
import Button from '../atoms/Button'
import { FaSearchMinus, FaSearchPlus } from 'react-icons/fa'
import { motion } from 'framer-motion'

interface ImageViewerProps {
    imageUrl?: string
    altText?: string,
}

function ImageViewer(props: ImageViewerProps) {
    const { imageUrl, altText} = props
    const [zoom, setZoom] = useState<number>(1);
    const MAX_ZOOM = 4

    const avaiableZooms: { [key: number]: string } = {
        1: "scale-100",
        2: "scale-150",
        3: "scale-200",
        4: "scale-300",
    }


    const zoomIn = () => { if (zoom < MAX_ZOOM) setZoom(zoom + 1) }
    const zoomOut = () => { if (zoom > 1) setZoom(zoom - 1) }

    return <div className='border-gray-300 overflow-hidden relative'>
        {/** Zoom controls */}
        <div className='absolute bottom-2 right-2 flex flex-col gap-1 z-1'>
            <Button icon={<FaSearchPlus />} variant='outline' onClick={zoomIn} />
            <Button icon={<FaSearchMinus />} variant='outline' onClick={zoomOut} />
            <span className='select-none text-center text-gray-500'>x{zoom}</span>
        </div>

        {/** Image */}
        <motion.img
            drag
            dragMomentum={false}
            dragConstraints={{ top: -100, left: -100, right: 100, bottom: 100 }}
            src={imageUrl}
            alt={altText}
            className={`w-full cursor-grab active:cursor-grabbing h-full ${avaiableZooms[`${zoom}`]} `}
        />
    </div>
}

export default ImageViewer
