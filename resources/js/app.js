import './bootstrap';

import $ from 'jquery';
window.$ = window.jQuery = $;

import * as echarts from 'echarts';
window.echarts = echarts;

function loadData(url, callback) {
    // console.log(url);
    $.getJSON(url, function (response) {
        // console.log(response.data);
        callback(response);
    });
}
window.loadData = loadData;

window.colorPalette = {
    /* ---  Colors  --- */
    red: '#db2828',
    orange: '#f2711c',
    yellow: '#fbbd08',
    olive: '#b5cc18',
    green: '#21ba45',
    teal: '#00b5ad',
    blue: '#2185d0',
    violet: '#6435c9',
    purple: '#a333c8',
    pink: '#e03997',
    brown: '#a5673f',
    grey: '#767676',
    black: '#1b1c1d',

    /* ---  Light Colors  --- */
    lightRed: '#ff695e',
    lightOrange: '#ff851b',
    lightYellow: '#ffe21f',
    lightOlive: '#d9e778',
    lightGreen: '#2ecc40',
    lightTeal: '#6dffff',
    lightBlue: '#54c8ff',
    lightViolet: '#a291fb',
    lightPurple: '#dc73ff',
    lightPink: '#ff8edf',
    lightBrown: '#d67c1c',
    lightGrey: '#dcddde',
    lightBlack: '#545454',

    /* ---   Neutrals  --- */
    fullBlack: '#000',
    offWhite: '#f9fafb',
    darkWhite: '#f3f4f5',
    midWhite: '#dcddde',
    white: '#fff',

    /* --- Colored Backgrounds --- */
    primaryBackground: '#dff0ff',
    secondaryBackground: '#f4f4f4',
    redBackground: '#ffe8e6',
    orangeBackground: '#ffedde',
    yellowBackground: '#fff8db',
    oliveBackground: '#fbfdef',
    greenBackground: '#e5f9e7',
    tealBackground: '#e1f7f7',
    blueBackground: '#dff0ff',
    violetBackground: '#eae7ff',
    purpleBackground: '#f6e7ff',
    pinkBackground: '#ffe3fb',
    brownBackground: '#f1e2d3',
    greyBackground: '#f4f4f4',
    blackBackground: '#f4f4f4',
}
