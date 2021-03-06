package com.example.josea.consultasmedicas.util;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

/**
 * Created by josea on 03/06/2017.
 */

public class UtilFecha {
    public static Date stringToDate(String date){
        SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
        Date fecha;
        try{
            fecha = sdf.parse(date);
            return fecha;
        }catch(ParseException e){
            fecha = new Date();
            fecha.setTime(0);
            return fecha;
        }
    }

    public static long dateToLong(String date){
        try {
            SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd_HH-mm-ss");
            Date fecha = sdf.parse(date);
            return fecha.getTime();
        } catch (ParseException e) {
            return -1;
        }
    }

    public static String formatStringDate(String formatStr, Date date) {
        if (date == null) {
            return null;
        }
        return android.text.format.DateFormat.format(formatStr, date).toString();
    }
}
