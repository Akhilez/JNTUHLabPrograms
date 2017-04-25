import java.io.*;
import java.util.*;
import javax.servlet.*;
import javax.servlet.annotation.*;
import javax.servlet.http.*;

public class Validate extends HttpServlet {
    private static final long serialVersionUID = 1L;

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        PrintWriter out = response.getWriter();
        boolean flag = false;

        String u = request.getParameter("t1");
        String p = request.getParameter("t2");

        ServletConfig cg = getServletConfig();
        Enumeration e = cg.getInitParameterNames();

        while (e.hasMoreElements()) {
            String u1 = (String) e.nextElement();
            String p1 = cg.getInitParameter(u1);

            if (u.equals(u1) && p.equals(p1)) {
                flag = true;
                break;
            }
        }

        if (flag == true)
            out.println("Hello," + u);
        else
            out.println("you are not an Authorized user");

        out.close();
    }
}