package com.example.josea.consultasmedicas.pojo;

/**
 * Created by josea on 23/05/2017.
 */

public class Usuario {

    private int id;
    private String seguridadSocial;
    private String password;
    private String firstName;
    private String lastName;

    public Usuario(int id, String seguridadSocial, String password, String firstName, String lastName) {
        this.id = id;
        this.seguridadSocial = seguridadSocial;
        this.password = password;
        this.firstName = firstName;
        this.lastName = lastName;
    }

    public Usuario() {}

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getSeguridadSocial() {
        return seguridadSocial;
    }

    public void setSeguridadSocial(String seguridadSocial) {
        this.seguridadSocial = seguridadSocial;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getFirstName() {
        return firstName;
    }

    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }

    public String getLastName() {
        return lastName;
    }

    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

    @Override
    public String toString() {
        return "Usuario{" +
                "id=" + id +
                ", seguridadSocial='" + seguridadSocial + '\'' +
                ", password='" + password + '\'' +
                ", firstName='" + firstName + '\'' +
                ", lastName='" + lastName + '\'' +
                '}';
    }
}
