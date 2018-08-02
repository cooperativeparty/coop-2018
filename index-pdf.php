<?php
/**
 * Filename: index-pdf.php
 * Project: WordPress PDF Templates
 * Copyright: (c) 2014-2016 Antti Kuosmanen
 * License: GPLv3
 *
 * Copy this file to your theme directory to start customising the PDF template.
*/
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>
            <?php wp_title(); ?>
        </title>
        <?php wp_head(); ?>
            <style>
                /* cyrillic-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: italic;
                    font-weight: 400;
                    src: local('Open Sans Italic'), local('OpenSans-Italic'), url(https://fonts.gstatic.com/s/opensans/v15/xjAJXh38I15wypJXxuGMBjTOQ_MqJVwkKsUn0wKzc2I.woff2) format('woff2');
                    unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
                }
                /* cyrillic */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: italic;
                    font-weight: 400;
                    src: local('Open Sans Italic'), local('OpenSans-Italic'), url(https://fonts.gstatic.com/s/opensans/v15/xjAJXh38I15wypJXxuGMBjUj_cnvWIuuBMVgbX098Mw.woff2) format('woff2');
                    unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
                }
                /* greek-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: italic;
                    font-weight: 400;
                    src: local('Open Sans Italic'), local('OpenSans-Italic'), url(https://fonts.gstatic.com/s/opensans/v15/xjAJXh38I15wypJXxuGMBkbcKLIaa1LC45dFaAfauRA.woff2) format('woff2');
                    unicode-range: U+1F00-1FFF;
                }
                /* greek */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: italic;
                    font-weight: 400;
                    src: local('Open Sans Italic'), local('OpenSans-Italic'), url(https://fonts.gstatic.com/s/opensans/v15/xjAJXh38I15wypJXxuGMBmo_sUJ8uO4YLWRInS22T3Y.woff2) format('woff2');
                    unicode-range: U+0370-03FF;
                }
                /* vietnamese */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: italic;
                    font-weight: 400;
                    src: local('Open Sans Italic'), local('OpenSans-Italic'), url(https://fonts.gstatic.com/s/opensans/v15/xjAJXh38I15wypJXxuGMBr6up8jxqWt8HVA3mDhkV_0.woff2) format('woff2');
                    unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
                }
                /* latin-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: italic;
                    font-weight: 400;
                    src: local('Open Sans Italic'), local('OpenSans-Italic'), url(https://fonts.gstatic.com/s/opensans/v15/xjAJXh38I15wypJXxuGMBiYE0-AqJ3nfInTTiDXDjU4.woff2) format('woff2');
                    unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
                }
                /* latin */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: italic;
                    font-weight: 400;
                    src: local('Open Sans Italic'), local('OpenSans-Italic'), url(https://fonts.gstatic.com/s/opensans/v15/xjAJXh38I15wypJXxuGMBo4P5ICox8Kq3LLUNMylGO4.woff2) format('woff2');
                    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
                }
                /* cyrillic-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: italic;
                    font-weight: 800;
                    src: local('Open Sans ExtraBold Italic'), local('OpenSans-ExtraBoldItalic'), url(https://fonts.gstatic.com/s/opensans/v15/PRmiXeptR36kaC0GEAetxiU8QAtQT9M0M1_mbVWrUPc.woff2) format('woff2');
                    unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
                }
                /* cyrillic */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: italic;
                    font-weight: 800;
                    src: local('Open Sans ExtraBold Italic'), local('OpenSans-ExtraBoldItalic'), url(https://fonts.gstatic.com/s/opensans/v15/PRmiXeptR36kaC0GEAetxkNaUOL0oYRolx8sebiIY9k.woff2) format('woff2');
                    unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
                }
                /* greek-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: italic;
                    font-weight: 800;
                    src: local('Open Sans ExtraBold Italic'), local('OpenSans-ExtraBoldItalic'), url(https://fonts.gstatic.com/s/opensans/v15/PRmiXeptR36kaC0GEAetxooGEx1DzoxsbCRd2IM2afI.woff2) format('woff2');
                    unicode-range: U+1F00-1FFF;
                }
                /* greek */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: italic;
                    font-weight: 800;
                    src: local('Open Sans ExtraBold Italic'), local('OpenSans-ExtraBoldItalic'), url(https://fonts.gstatic.com/s/opensans/v15/PRmiXeptR36kaC0GEAetxnPzCMEhbIaaYiFY6KPniws.woff2) format('woff2');
                    unicode-range: U+0370-03FF;
                }
                /* vietnamese */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: italic;
                    font-weight: 800;
                    src: local('Open Sans ExtraBold Italic'), local('OpenSans-ExtraBoldItalic'), url(https://fonts.gstatic.com/s/opensans/v15/PRmiXeptR36kaC0GEAetxmqi69zMYkLa7XwlUIemKB4.woff2) format('woff2');
                    unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
                }
                /* latin-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: italic;
                    font-weight: 800;
                    src: local('Open Sans ExtraBold Italic'), local('OpenSans-ExtraBoldItalic'), url(https://fonts.gstatic.com/s/opensans/v15/PRmiXeptR36kaC0GEAetxowYyzpnB4tyYboSwKGmD2g.woff2) format('woff2');
                    unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
                }
                /* latin */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: italic;
                    font-weight: 800;
                    src: local('Open Sans ExtraBold Italic'), local('OpenSans-ExtraBoldItalic'), url(https://fonts.gstatic.com/s/opensans/v15/PRmiXeptR36kaC0GEAetxnibbpXgLHK_uTT48UMyjSM.woff2) format('woff2');
                    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
                }
                /* cyrillic-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 300;
                    src: local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v15/DXI1ORHCpsQm3Vp6mXoaTa-j2U0lmluP9RWlSytm3ho.woff2) format('woff2');
                    unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
                }
                /* cyrillic */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 300;
                    src: local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v15/DXI1ORHCpsQm3Vp6mXoaTZX5f-9o1vgP2EXwfjgl7AY.woff2) format('woff2');
                    unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
                }
                /* greek-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 300;
                    src: local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v15/DXI1ORHCpsQm3Vp6mXoaTRWV49_lSm1NYrwo-zkhivY.woff2) format('woff2');
                    unicode-range: U+1F00-1FFF;
                }
                /* greek */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 300;
                    src: local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v15/DXI1ORHCpsQm3Vp6mXoaTaaRobkAwv3vxw3jMhVENGA.woff2) format('woff2');
                    unicode-range: U+0370-03FF;
                }
                /* vietnamese */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 300;
                    src: local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v15/DXI1ORHCpsQm3Vp6mXoaTf8zf_FOSsgRmwsS7Aa9k2w.woff2) format('woff2');
                    unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
                }
                /* latin-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 300;
                    src: local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v15/DXI1ORHCpsQm3Vp6mXoaTT0LW-43aMEzIO6XUTLjad8.woff2) format('woff2');
                    unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
                }
                /* latin */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 300;
                    src: local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v15/DXI1ORHCpsQm3Vp6mXoaTegdm0LZdjqr5-oayXSOefg.woff2) format('woff2');
                    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
                }
                /* cyrillic-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/K88pR3goAWT7BTt32Z01mxJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
                    unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
                }
                /* cyrillic */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/RjgO7rYTmqiVp7vzi-Q5URJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
                    unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
                }
                /* greek-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/LWCjsQkB6EMdfHrEVqA1KRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
                    unicode-range: U+1F00-1FFF;
                }
                /* greek */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/xozscpT2726on7jbcb_pAhJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
                    unicode-range: U+0370-03FF;
                }
                /* vietnamese */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/59ZRklaO5bWGqF5A9baEERJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
                    unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
                }
                /* latin-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/u-WUoqrET9fUeobQW7jkRRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
                    unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
                }
                /* latin */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 400;
                    src: local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/cJZKeOuBrn4kERxqtaUH3VtXRa8TVwTICgirnJhmVJw.woff2) format('woff2');
                    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
                }
                /* cyrillic-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 600;
                    src: local('Open Sans SemiBold'), local('OpenSans-SemiBold'), url(https://fonts.gstatic.com/s/opensans/v15/MTP_ySUJH_bn48VBG8sNSq-j2U0lmluP9RWlSytm3ho.woff2) format('woff2');
                    unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
                }
                /* cyrillic */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 600;
                    src: local('Open Sans SemiBold'), local('OpenSans-SemiBold'), url(https://fonts.gstatic.com/s/opensans/v15/MTP_ySUJH_bn48VBG8sNSpX5f-9o1vgP2EXwfjgl7AY.woff2) format('woff2');
                    unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
                }
                /* greek-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 600;
                    src: local('Open Sans SemiBold'), local('OpenSans-SemiBold'), url(https://fonts.gstatic.com/s/opensans/v15/MTP_ySUJH_bn48VBG8sNShWV49_lSm1NYrwo-zkhivY.woff2) format('woff2');
                    unicode-range: U+1F00-1FFF;
                }
                /* greek */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 600;
                    src: local('Open Sans SemiBold'), local('OpenSans-SemiBold'), url(https://fonts.gstatic.com/s/opensans/v15/MTP_ySUJH_bn48VBG8sNSqaRobkAwv3vxw3jMhVENGA.woff2) format('woff2');
                    unicode-range: U+0370-03FF;
                }
                /* vietnamese */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 600;
                    src: local('Open Sans SemiBold'), local('OpenSans-SemiBold'), url(https://fonts.gstatic.com/s/opensans/v15/MTP_ySUJH_bn48VBG8sNSv8zf_FOSsgRmwsS7Aa9k2w.woff2) format('woff2');
                    unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
                }
                /* latin-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 600;
                    src: local('Open Sans SemiBold'), local('OpenSans-SemiBold'), url(https://fonts.gstatic.com/s/opensans/v15/MTP_ySUJH_bn48VBG8sNSj0LW-43aMEzIO6XUTLjad8.woff2) format('woff2');
                    unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
                }
                /* latin */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 600;
                    src: local('Open Sans SemiBold'), local('OpenSans-SemiBold'), url(https://fonts.gstatic.com/s/opensans/v15/MTP_ySUJH_bn48VBG8sNSugdm0LZdjqr5-oayXSOefg.woff2) format('woff2');
                    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
                }
                /* cyrillic-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 700;
                    src: local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v15/k3k702ZOKiLJc3WVjuplzK-j2U0lmluP9RWlSytm3ho.woff2) format('woff2');
                    unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
                }
                /* cyrillic */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 700;
                    src: local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v15/k3k702ZOKiLJc3WVjuplzJX5f-9o1vgP2EXwfjgl7AY.woff2) format('woff2');
                    unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
                }
                /* greek-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 700;
                    src: local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v15/k3k702ZOKiLJc3WVjuplzBWV49_lSm1NYrwo-zkhivY.woff2) format('woff2');
                    unicode-range: U+1F00-1FFF;
                }
                /* greek */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 700;
                    src: local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v15/k3k702ZOKiLJc3WVjuplzKaRobkAwv3vxw3jMhVENGA.woff2) format('woff2');
                    unicode-range: U+0370-03FF;
                }
                /* vietnamese */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 700;
                    src: local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v15/k3k702ZOKiLJc3WVjuplzP8zf_FOSsgRmwsS7Aa9k2w.woff2) format('woff2');
                    unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
                }
                /* latin-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 700;
                    src: local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v15/k3k702ZOKiLJc3WVjuplzD0LW-43aMEzIO6XUTLjad8.woff2) format('woff2');
                    unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
                }
                /* latin */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 700;
                    src: local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v15/k3k702ZOKiLJc3WVjuplzOgdm0LZdjqr5-oayXSOefg.woff2) format('woff2');
                    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
                }
                /* cyrillic-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 800;
                    src: local('Open Sans ExtraBold'), local('OpenSans-ExtraBold'), url(https://fonts.gstatic.com/s/opensans/v15/EInbV5DfGHOiMmvb1Xr-hq-j2U0lmluP9RWlSytm3ho.woff2) format('woff2');
                    unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
                }
                /* cyrillic */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 800;
                    src: local('Open Sans ExtraBold'), local('OpenSans-ExtraBold'), url(https://fonts.gstatic.com/s/opensans/v15/EInbV5DfGHOiMmvb1Xr-hpX5f-9o1vgP2EXwfjgl7AY.woff2) format('woff2');
                    unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
                }
                /* greek-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 800;
                    src: local('Open Sans ExtraBold'), local('OpenSans-ExtraBold'), url(https://fonts.gstatic.com/s/opensans/v15/EInbV5DfGHOiMmvb1Xr-hhWV49_lSm1NYrwo-zkhivY.woff2) format('woff2');
                    unicode-range: U+1F00-1FFF;
                }
                /* greek */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 800;
                    src: local('Open Sans ExtraBold'), local('OpenSans-ExtraBold'), url(https://fonts.gstatic.com/s/opensans/v15/EInbV5DfGHOiMmvb1Xr-hqaRobkAwv3vxw3jMhVENGA.woff2) format('woff2');
                    unicode-range: U+0370-03FF;
                }
                /* vietnamese */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 800;
                    src: local('Open Sans ExtraBold'), local('OpenSans-ExtraBold'), url(https://fonts.gstatic.com/s/opensans/v15/EInbV5DfGHOiMmvb1Xr-hv8zf_FOSsgRmwsS7Aa9k2w.woff2) format('woff2');
                    unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
                }
                /* latin-ext */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 800;
                    src: local('Open Sans ExtraBold'), local('OpenSans-ExtraBold'), url(https://fonts.gstatic.com/s/opensans/v15/EInbV5DfGHOiMmvb1Xr-hj0LW-43aMEzIO6XUTLjad8.woff2) format('woff2');
                    unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
                }
                /* latin */
                
                @font-face {
                    font-family: 'Open Sans';
                    font-style: normal;
                    font-weight: 800;
                    src: local('Open Sans ExtraBold'), local('OpenSans-ExtraBold'), url(https://fonts.gstatic.com/s/opensans/v15/EInbV5DfGHOiMmvb1Xr-hugdm0LZdjqr5-oayXSOefg.woff2) format('woff2');
                    unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
                }
                
                body {
                    font: 13pt 'Open Sans';
                    line-height: 1.3;
                    background: #fff !important;
                    color: #000;
                }
                
                h1 {
                    font: 32pt 'Open Sans';
                    color: #501664;
                    letter-spacing: -.08em;
                    font-weight: 800;
                }
                
                h2,
                h3,
                h4 {
                    margin-top: 25px;
                    font: 14pt 'Open Sans'
                }
                /* Alle Seitenumbrüche definieren */
                
                a {
                    page-break-inside: avoid
                }
                
                blockquote {
                    page-break-inside: avoid;
                }
                
                h1,
                h2,
                h3,
                h4,
                h5,
                h6 {
                    page-break-after: avoid;
                    page-break-inside: avoid
                }
                
                img {
                    page-break-inside: avoid;
                    page-break-after: avoid;
                }
                
                table,
                pre {
                    page-break-inside: avoid
                }
                
                ul,
                ol,
                dl {
                    page-break-before: avoid
                }
                /* Linkfarbe und Linkverhalten darstellen */
                
                a:link,
                a:visited,
                a {
                    background: transparent;
                    font: 13pt 'Open Sans';
                    color: #711f8e;
                    font-weight: bold;
                    text-decoration: none;
                    text-align: left;
                }
                
                a {
                    page-break-inside: avoid;
                }
                
                a[href^=http]:after {
                    font: 13pt 'Open Sans';
                    content: "&nbsp( " attr(href) " ) ";
                }
            </style>
    </head>

    <body>
        <div class="container">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="post-header">
                    <h1><?php the_title(); ?></h1>
                    <table>
                        <tr>
                            <th align="right" valign="top">From:</th>
                            <td valign="top" style="padding-left:20px">
                                <?php the_author();?>
                            </td>
                        </tr>
                        <tr>
                            <th align="right" valign="top">FAO:</th>
                            <td valign="top" style="padding-left:20px"> Party Officers </td>
                        </tr>
                        <tr>
                            <th align="right" valign="top">Published:</th>
                            <td valign="top" style="padding-left:20px">
                                <?php the_date();?>
                            </td>
                        </tr>
                        <tr>
                            <th align="right" valign="top">Printed:</th>
                            <td valign="top" style="padding-left:20px">
                                <?php echo date(get_option('date_format')); ?>
                            </td>
                        </tr>
                        <tr>
                            <th align="right" valign="top">Source:</th>
                            <td valign="top" style="padding-left:20px">
                                <?php the_permalink();?>
                            </td>
                        </tr>
                    </table>
                </div>
                <hr/>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
                <?php endwhile; endif; ?>
        </div>
        <?php wp_footer(); ?>
    </body>

    </html>