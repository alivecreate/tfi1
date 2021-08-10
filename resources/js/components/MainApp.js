import React from 'react';
import ReactDOM from 'react-dom';
import MediaModal from './admin/ui/MultipleImg/MediaModal';
import ImageUpload from './admin/ui/Product/ImageUpload';
import MediaContext, {MediaProvider} from './admin/ui/MultipleImg/MediaContext';

function MainApp() {
    return (
        <div className="container">
            
        </div>
    );
}

function MultipleImageUpload() {
    return (
        
        <MediaProvider>
            <MediaModal />
        </MediaProvider>
    );
}
function ProductMulImages() {
    return (
        
        <MediaProvider>
            <ImageUpload />
        </MediaProvider>
    );
}

export default MainApp;

if (document.getElementById('app')) {
    ReactDOM.render(<MainApp />, document.getElementById('app'));
}

if (document.getElementById('multipleImageUpload')) {
    ReactDOM.render(<MultipleImageUpload />, document.getElementById('multipleImageUpload'));
}

if (document.getElementById('product_mul_images')) {
    ReactDOM.render(<ProductMulImages />, document.getElementById('product_mul_images'));
}


