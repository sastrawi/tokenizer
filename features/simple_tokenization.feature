Feature: Simple Tokenization
  I need to be able to tokenize any given text

  Scenario: Tokenize by whitespace
    Given The following text:
      """
      Ini kalimat pertama. Ini kalimat kedua.
      """
    When I tokenize it
    Then I should get the following tokens:
      """
      Ini kalimat pertama . Ini kalimat kedua .
      """

  Scenario: Tokenize by punctuation
    Given The following text:
      """
      Budi pergi ke pasar, membeli banyak hal: sapu, payung, keramik.
      """
    When I tokenize it
    Then I should get the following tokens:
      """
      Budi pergi ke pasar , membeli banyak hal : sapu , payung , keramik .
      """

  Scenario: Tokenize multiple whitespace
    Given The following text:
      """
      Budi   belajar   NLP. Budi   melakukan   tokenization.
      """
    When I tokenize it
    Then I should get the following tokens:
      """
      Budi belajar NLP . Budi melakukan tokenization .
      """

  Scenario: Tokenize multiple punctuation
    Given The following text:
      """
      Budi   belajar   NLP... Benarkah Budi   melakukan   tokenization??!?
      """
    When I tokenize it
    Then I should get the following tokens:
      """
      Budi belajar NLP ... Benarkah Budi melakukan tokenization ??!?
      """
