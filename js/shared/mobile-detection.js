function isMobile() {
  return ( document.body && document.body.clientWidth < 768);
}

function whenMobile(mobileFunc) {
  if (isMobile()) {
    mobileFunc();
  }
}

function whenDesktop(func) {
  if (!isMobile()) {
    func();
  }
}

export {isMobile, whenMobile, whenDesktop};