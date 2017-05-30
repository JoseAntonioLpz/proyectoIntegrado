package com.example.josea.consultasmedicas.util;

import com.example.josea.consultasmedicas.pojo.Cita;
import com.example.josea.consultasmedicas.pojo.Usuario;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.Date;

/**
 * Created by josea on 26/05/2017.
 */

public class Conversor {

    public static JSONObject citaToJson(Cita cita){
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("id", cita.getId());
            jsonObject.put("seguridadSocial", cita.getSeguridadSocial());
            jsonObject.put("reason", cita.getReason());
            jsonObject.put("type", cita.getType());
            jsonObject.put("telephone", cita.getTelephone());
            //jsonObject.put("fecha", cita.getFecha());
            jsonObject.put("fecha" , "25-3-1998");

            return jsonObject;
        }catch (JSONException e){
            e.printStackTrace();
            return null;
        }
    }

    public static Cita citaFromJson(String json) throws JSONException {
        Cita cita = new Cita();
        JSONObject  objeto = new JSONObject(json);
        cita.setId(objeto.getInt("id"));
        cita.setSeguridadSocial(objeto.getString("seguridadSocial"));
        cita.setReason(objeto.getString("reason"));
        cita.setType(objeto.getString("type"));
        cita.setTelephone(objeto.getString("telephone"));
        //cita.setFecha(objeto.getString("fecha"));
        cita.setFecha(new Date());
        return cita;
    }

    public static JSONObject userToJson(Usuario user){
        JSONObject jsonObject = new JSONObject();
        try {
            jsonObject.put("id", user.getId());
            jsonObject.put("seguridadSocial", user.getSeguridadSocial());
            jsonObject.put("firstName", user.getFirstName());
            jsonObject.put("lastName", user.getLastName());
            jsonObject.put("password", user.getPassword());

            return jsonObject;
        }catch (JSONException e) {
            e.printStackTrace();
            return null;
        }
    }
    public static Usuario userFromJson(String json) throws JSONException {
        Usuario user = new Usuario();
        JSONObject  objeto = new JSONObject(json);
        user.setId(objeto.getInt("id"));
        user.setSeguridadSocial(objeto.getString("seguridadSocial"));
        user.setFirstName(objeto.getString("firstName"));
        user.setLastName(objeto.getString("lastName"));
        user.setPassword(objeto.getString("password"));
        return user;
    }
}
