# PHP Chapter 3 — Multi-dimensional Arrays to Defining Functions

## Overview

This section of Chapter 3 covers multi-dimensional arrays, array functions, and the introduction and definition of functions in PHP.

The material is organized from **Multi-dimensional Arrays** through **Defining a Function**, following the structure and terminology used in the lecture slides.

---

## 1. Multi-dimensional Arrays

A multidimensional array is an array that contains one or more arrays.

A two-dimensional array is an array of arrays. A three-dimensional array is an array of arrays of arrays.

Multidimensional arrays are useful when data is arranged in a tabular form, such as rows and columns.

The dimension of an array indicates the number of indices needed to select an element.

### Two-dimensional numerical indexed arrays

A two-dimensional numerical indexed array contains multiple arrays. Each inner array represents a group of related values.

---

## 2. Array Functions

PHP provides built-in array functions that can be used to access and manipulate arrays.

### is_array

Checks whether a variable is an array.

### in_array

Checks whether a specified value exists in an array.

### count

Returns the number of elements in an array.

The `sizeof` function behaves like `count`.

### sort

Sorts an array in ascending order.

### rsort

Sorts an array in descending order.

### asort

Sorts an associative array in ascending order according to its values.

### arsort

Sorts an associative array in descending order according to its values.

### max

Returns the highest value in an array.

### min

Returns the lowest value in an array.

### implode

Converts an array into a string.

### explode

Takes a string containing several words separated by a character and places the words into an array.

### shuffle

Shuffles the elements of an array and puts them in random order.

### array_merge

Merges one or more arrays into one array.

### array_reverse

Returns an array in reverse order.

### array_push

Adds elements to the end of an array and returns the new number of elements.

### array_pop

Removes the last element of an array and returns the removed element.

### end

Sets the internal pointer of an array to its last element and returns its value.

---

## 3. Introduction to Functions

A function is a set of statements that performs a particular task and may optionally return a value.

A section of code that is used more than once can be placed inside a function and called by its name whenever it is needed.

Functions can accept values as input, perform operations, and optionally return a value.

A function does not execute automatically when a PHP page loads. It must be called.

---

## 4. Advantages of Functions

Functions provide several advantages:

- Less typing and less code
- Reduced programming and syntax errors
- Code reusability
- Ability to accept arguments
- A function can be defined once and called many times
- Functions can be used for both general and specific cases

---

## 5. Defining a Function

A function definition starts with the `function` keyword.

A function has a name followed by parentheses.

Parameters are placed inside the parentheses when needed.

The statements that make up the function are placed inside curly braces.

The opening curly brace starts the function body, and the closing curly brace ends it.

Function names in PHP are not case-sensitive.

Parameters are optional and can be separated by commas when more than one parameter is used.

A function is executed when it is called.

---

## Key Terms

### Array
A variable that can hold multiple values mapped to keys or indexes.

### Multidimensional Array
An array that contains one or more arrays.

### Function
A set of statements that performs a particular task.

### Parameter
A variable listed in a function definition that receives a value when the function is called.

### Argument
A value passed to a function when the function is called.

---

## Chapter Focus

1. Multi-dimensional arrays
2. Two-dimensional numerical indexed arrays
3. Built-in array functions
4. Introduction to functions
5. Advantages of functions
6. Function definition
7. Parameters and function calls

---

#