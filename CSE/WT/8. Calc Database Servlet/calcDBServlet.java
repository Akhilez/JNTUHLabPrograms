import java.io.*;
import javax.servlet.*;
import javax.servlet.annotation.*;
import javax.servlet.http.*;
import java.sql.*;

public class calcDBServlet extends HttpServlet {
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws
            ServletException, IOException {
        int t1 = Integer.parseInt(request.getParameter("t1"));
        int t2 = Integer.parseInt(request.getParameter("t2"));
        String op = request.getParameter("t3");

        Connection con;
        PreparedStatement pst, pst2;
        ResultSet rs;
        PrintWriter pw = response.getWriter();

        try {
            DriverManager.registerDriver(new com.mysql.jdbc.Driver());
            con = DriverManager.getConnection("jdbc:mysql://localhost:3306/wtdb", "root", "kmit");
            pw.println("connected");
            pst = con.prepareStatement("select result from qlog where query=?");

            String s = t1 + "" + op + "" + t2;
            pst.setString(1, s);
            rs = pst.executeQuery();

            if (rs.next()) pw.println("RESULT from database=" + rs.getString(1));
            else {
                int res = 0;
                switch (op) {
                    case "+": res = t1 + t2; break;
                    case "-": res = t1 - t2; break;
                    case "*": res = t1 * t2; break;
                    case "/": res = t1 / t2; break;
                }

                pst2 = con.prepareStatement("insert into qlog values(?,?)");
                pst2.setString(1, s);
                String s2 = res + "";
                pst2.setString(2, s2);
                int i = pst2.executeUpdate();

                if (i > 0) pw.println("QUERY=" + s + " RESULT=" + res + " INSERTED IN THE DATABASE");
                pw.println("RESULT=" + res);
                pst2.close();
            }
            rs.close();
            pst.close();
            con.close();
        } catch (Exception e) {
            pw.println(e);
        }
    }
}