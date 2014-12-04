Feature: Entity Tokenization
  I need to be able to tokenize any given text

  Scenario: Tokenize abbreviation #1
    Given The following text:
      """ 
      Jl. Prof. Dr. Soepomo SH no. 67.
      """
    When I tokenize it
    Then I should get the following tokens:
      """ 
      Jl. Prof. Dr. Soepomo SH no. 67 .
      """

  Scenario: Tokenize number #1
    Given The following text:
      """ 
      Rp. 5.000.000.
      """
    When I tokenize it
    Then I should get the following tokens:
      """ 
      Rp. 5.000.000 .
      """

  Scenario: Tokenize email address #1
    Given The following text:
      """ 
      Budi mengirim email ke andy.librian@gmail.com.
      """
    When I tokenize it
    Then I should get the following tokens:
      """ 
      Budi mengirim email ke andy.librian@gmail.com .
      """

  Scenario: Tokenize hostname #1
    Given The following text:
      """ 
      Budi mengakses sastrawi.github.io. 
      """
    When I tokenize it
    Then I should get the following tokens:
      """ 
      Budi mengakses sastrawi.github.io .
      """

  Scenario: Tokenize url #1
    Given The following text:
      """ 
      Budi mengakses http://sastrawi.github.io. 
      """
    When I tokenize it
    Then I should get the following tokens:
      """ 
      Budi mengakses http://sastrawi.github.io .
      """

