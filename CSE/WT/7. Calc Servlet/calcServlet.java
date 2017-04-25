import java.io.*;
import javax.servlet.*;
import javax.servlet.annotation.*;
import javax.servlet.http.*;

public class calcServlet extends HttpServlet {
    public void serv1() {
        super();
    }

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        PrintWriter pw = response.getWriter();

        int n1 = Integer.parseInt(request.getParameter("t1"));
        int n2 = Integer.parseInt(request.getParameter("t2"));

        String op = request.getParameter("t3");
        int result = 0, x = 0;

        switch (op) {
            case "+": result = n1 + n2; break;
            case "-": result = n1 - n2; break;
            case "*": result = n1 * n2; break;
            case "/": result = n1 / n2; break;
            case "%": result = n1 % n2; break;
            default: x = -1;
        }

        if (x == -1) pw.println("invalid operator");
        else pw.println("RESULT=" + result);
    }
}