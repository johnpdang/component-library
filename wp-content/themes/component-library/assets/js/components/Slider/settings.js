const settings = {
  default: {
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true
  },
  heroSlide: {
    // slidesToShow: 2,
    // slidesToScroll: 1,
    infinite: false,
    variableWidth: true,
    arrows: true,
    dots: true
  },
  oneSlide: {
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    arrows: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          dots: true
        }
      }
    ]
  },
  twoSlide: {
    slidesToShow: 2,
    slidesToScroll: 1,
    infinite: true
    // arrows: true
  },
  threeSlide: {
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true
  },
  fourSlide: {
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ],
    arrows: true
  },
  fiveSlide: {
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: true
  }
};

export default settings;
