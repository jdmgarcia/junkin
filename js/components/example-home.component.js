import {whenDesktop, whenMobile} from '../shared/mobile-detection';

export default function() {

  whenDesktop(() => {
    console.log('In desktop');
  });

  whenMobile(() => {
    console.log('In mobile');
  });

}